export async function getCategories() {
    try {
        const response = await axios.get('/api/categories');

        return [response.data, null];
    } catch (err) {
        return [null, err];
    }
}