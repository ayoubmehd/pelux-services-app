import axios from "axios";
// Refactor the way of fetching api
// async function handleError(callback) {
//     try {
//         const response = await callback();

//         return [response.data, null];
//     } catch (error) {
//         return [null, error];
//     }
// }

export async function getService(id) {
    try {
        const response = await axios.get(`/api/services/${id}`);

        return [response.data, null];
    } catch (error) {
        return [null, error];
    }
}

export async function getSimilarServices(id) {
    try {
        const response = await axios.get(`/api/services/${id}/similars`);

        return [response.data, null];
    } catch (error) {
        return [null, error];
    }
}

export async function getServices(query) {
    try {
        const response = await axios.get(`/api/services/${query}`);

        return [response.data, null];
    } catch (error) {
        return [null, error];
    }
}