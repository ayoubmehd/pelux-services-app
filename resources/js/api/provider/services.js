export async function saveService({ title, content, category, city, keywords }) {

    try {
        const response = await axios.post('/api/provider/services', {
            title,
            description: content,
            category,
            city_id: city,
            keywords
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