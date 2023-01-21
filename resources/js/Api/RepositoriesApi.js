// axios
import axios from "axios";
export default class RepositoriesApi {
    base_url = "/api/repositories";

    async find(id) {
        try {
            const response = await axios.get(`${this.base_url}/${id}`);
            return response.data;
        }
        catch (error) {
            console.log(error);
        }
    }
}
