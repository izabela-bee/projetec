function getQueryParam(name) {
    const params = new URLSearchParams(window.location.search);
    return params.has(name) ? params.get(name) : null;
}

export function showMessageFromQuery(paramName){
    const msg = getQueryParam(paramName);
    return msg;
}
