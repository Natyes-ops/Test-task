// Servises
const postData = async (url, data) => {
    const res = await fetch(url, {
        method: 'POST',
        headers: {
            'Content-type': 'application/json'
        },
        body: data
    });
    return await res.json();
}
const getData = async (url) => {
    const res = await fetch(url);

    if (!res.ok) {
        throw new Error(`Url: ${url}, status: ${res.status}`)
    }
    return await res.json();
}
// Validate JSON
const validateJson = (json) => {
    try {
        JSON.parse(json);
    } catch (e) {
        return false;
    }
    return true;
}
