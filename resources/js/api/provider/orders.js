
export async function getOrder(id) {
    try {
        const response = await axios.get(`/api/provider/orders/${id}`);

        return [response.data, null];
    } catch (error) {
        return [null, error];
    }
}