let currentContactId = null
let messageRefreshInterval = null


// Initialize chat on page load
document.addEventListener("DOMContentLoaded", () => {
  loadContacts()
  setupEventListeners()
})

function setupEventListeners() {
  const form = document.querySelector(".form-input")
  if (form) {
    form.addEventListener("submit", (e) => {
      e.preventDefault()
      sendMessage()
    })
  }

  document.addEventListener("click", (e) => {
    if (e.target.closest(".caixa-nome, .caixa-nome-lucas")) {
      const contactBox = e.target.closest(".caixa-nome, .caixa-nome-lucas")
      const contactId = contactBox.dataset.contactId
      selectContact(contactId)
    }
  })
}

async function loadContacts() {
  try {
    const response = await fetch("../src/controllers/chat_backend.php?action=get_contacts")
    const data = await response.json()

    if (data.sucesso && data.contatos) {
      renderContacts(data.contatos)
    }
  } catch (error) {
    console.error("[v0] Erro ao carregar contatos:", error)
  }
}

function renderContacts(contatos) {
  const container = document.querySelector(".lista-nomes")
  if (!container) return

  container.innerHTML = ""

  contatos.forEach((contato) => {
    const caixa = document.createElement("div")
    caixa.className = currentContactId === contato.id ? "caixa-nome-lucas" : "caixa-nome"
    caixa.dataset.contactId = contato.id

    const colorClass = getColorForDiscipline(contato.disciplina)
    const disciplineName = extractDisciplineName(contato.disciplina)
    const foto = contato.Foto_Perfil || "../public/img/fotosPerfil/perfilPadrao.png"

    caixa.innerHTML = `
            <div class="${colorClass}">
                <div>
                    <h1 class="nome-monitor">${contato.Nome}</h1>
                    <p class="titulo-monitor-caixa-nome">${disciplineName}</p>
                </div>
            </div>
            <img class="icone-contato" src="${foto}" alt="Foto de ${contato.Nome}">
        `

    container.appendChild(caixa)
  })
}

async function selectContact(contactId) {
  currentContactId = contactId

  // Clear previous interval
  if (messageRefreshInterval) {
    clearInterval(messageRefreshInterval)
  }

  try {
    // Get contact details
    const detailsFormData = new FormData()
    detailsFormData.append("contact_id", contactId)

    const detailsResponse = await fetch("../src/controllers/chat_backend.php?action=get_contact_details", {
      method: "POST",
      body: detailsFormData,
    })
    const detailsData = await detailsResponse.json()

    if (detailsData.sucesso) {
      updateHeaderContact(detailsData.contato)
    }

    // Load messages
    loadMessages(contactId)

    messageRefreshInterval = setInterval(() => {
      loadMessages(contactId)
    }, 2000)

    // Refresh contacts to update UI
    loadContacts()
  } catch (error) {
    console.error("[v0] Erro ao selecionar contato:", error)
  }
}

function updateHeaderContact(contato) {
  const header = document.querySelector(".cabecalho-fundo")
  const foto = contato.Foto_Perfil || "../public/img/fotosPerfil/perfilPadrao.png"
  const disciplineName = extractDisciplineName(contato.disciplina)

  header.innerHTML = `
        <img class="icone-cabecalho" src="${foto}" alt="Foto de ${contato.Nome}">
        <div class="nome-titulo-monitor">
            <h2>${contato.Nome}</h2>
            <p class="titulo-monitor-cabecalho">Monitor de ${disciplineName}</p>
        </div>
    `
}

async function loadMessages(contactId) {
  try {
    const formData = new FormData()
    formData.append("contact_id", contactId)

    const response = await fetch("../src/controllers/chat_backend.php?action=get_messages", {
      method: "POST",
      body: formData,
    })

    const data = await response.json()

    if (data.sucesso && data.mensagens) {
      renderMessages(data.mensagens, contactId)
    }
  } catch (error) {
    console.error("[v0] Erro ao carregar mensagens:", error)
  }
}

function renderMessages(mensagens, contactId) {
  const container = document.querySelector(".mensagens-container")
  if (!container) return

  const currentMessages = container.innerHTML
  let newHTML = ""

  mensagens.forEach((msg) => {
    const isCurrentUserSender = msg.remetente_id === getCurrentUserId()
    const messageClass = isCurrentUserSender ? "direita" : "esquerda"
    const horario = formatTime(msg.data_hora)

    newHTML += `
            <div class="mensagens-geral ${messageClass}">
                <p class="texto">${escapeHtml(msg.conteudo)}</p>
                <p class="hora">${horario}</p>
            </div>
        `
  })

  // Only update if content changed
  if (currentMessages !== newHTML) {
    container.innerHTML = newHTML
    container.scrollTop = container.scrollHeight
  }
}

async function sendMessage() {
  if (!currentContactId) {
    alert("Selecione um contato primeiro")
    return
  }

  const input = document.querySelector('input[name="text"]')
  const messageText = input.value.trim()

  if (!messageText) return

  try {
    const formData = new FormData()
    formData.append("contact_id", currentContactId)
    formData.append("mensagem", messageText)

    const response = await fetch("../src/controllers/chat_backend.php?action=send_message", {
      method: "POST",
      body: formData,
    })

    const data = await response.json()

    if (data.sucesso) {
      input.value = ""
      loadMessages(currentContactId)
    } else {
      alert("Erro: " + data.erro)
    }
  } catch (error) {
    console.error("[v0] Erro ao enviar mensagem:", error)
    alert("Erro ao enviar mensagem")
  }
}

function getCurrentUserId() {
  // This will be set by PHP in the chat.php page
  return window.currentUserId
}

function formatTime(timestamp) {
  const date = new Date(timestamp)
  const hours = String(date.getHours()).padStart(2, "0")
  const minutes = String(date.getMinutes()).padStart(2, "0")
  return `${hours}:${minutes}`
}

function getColorForDiscipline(disciplina) {
  if (!disciplina) return "caixa-historia"

  const disciplinaLower = disciplina.toLowerCase()

  if (disciplinaLower.includes("matemática")) return "caixa-matematica"
  if (disciplinaLower.includes("português")) return "caixa-portugues"
  if (disciplinaLower.includes("história")) return "caixa-historia"
  if (disciplinaLower.includes("eletrônica") || disciplinaLower.includes("analógica")) return "caixa-elet-analogica"
  if (disciplinaLower.includes("biologia")) return "caixa-biologia"
  if (disciplinaLower.includes("química")) return "caixa-quimica"
  if (disciplinaLower.includes("física")) return "caixa-fisica"

  return "caixa-historia"
}

function extractDisciplineName(disciplina) {
  if (!disciplina) return "Disciplina"
  return disciplina.split("-")[0].trim()
}

function escapeHtml(text) {
  const map = {
    "&": "&amp;",
    "<": "&lt;",
    ">": "&gt;",
    '"': "&quot;",
    "'": "&#039;",
  }
  return text.replace(/[&<>"']/g, (m) => map[m])
}
