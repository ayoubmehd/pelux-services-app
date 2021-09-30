export async function saveService({ title, content, categories, city }) {

    try {
        const response = await axios.post('/api/provider/services', {
            title,
            description: content,
            categories,
            city_id: city
        });

        return [response.data, null];
    } catch (error) {
        return [null, error];
    }

}

export async function updateService(data, id) {

    try {
        const response = await axios({
            method: 'PATCH',
            url: `/api/provider/services/${id}`,
            data
        });

        return [response.data.data, null];
    } catch (error) {
        return [null, error];
    }

}