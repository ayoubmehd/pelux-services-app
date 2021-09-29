export async function getCities() {
    try {
        const response = await axios.get('/api/cities');

        return [response.data, null];
    } catch (err) {
        return [null, err];
    }
}