export const Login = async (form) => {
    try {
        const res = await axios({
            method: "post",
            url: "/login",
            data: form,
            headers: {
                "Content-Type": "multipart/form-data",
                "Accept": "application/json"
            }
        });
        return [res, null];
    } catch (error) {
        return [null, error];
    }
}
export const Register = async (form) => {
    try {
        const res = await axios({
            method: "post",
            url: "/register",
            data: form,
            headers: {
                "Content-Type": "multipart/form-data",
                "Accept": "application/json"
            }
        });
        return [res, null];
    } catch (error) {
        return [null, error];
    }
}

export async function getLoggedInUser() {
    try {
        const res = await axios.get("/api/user");
        return [res, null];
    } catch (error) {
        return [null, error];
    }
}