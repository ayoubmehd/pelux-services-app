import axios from "axios";

export async function getService(id) {
    try {
        const response = await axios.get(`/api/services/${id}`);

        return [response.data, null];
    } catch (error) {
        return [null, error];
    }
}