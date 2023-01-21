// axios
import axios from "axios";
export default class RepositoriesApi {
    base_url = "/api/repositories";

    async all(id) {
        try {
            const response = await axios.get(`${this.base_url}/${id}`);
            return response.data;
        }
        catch (error) {
            console.log(error);
        }
    }
    async find(username, repository) {
        try {
            const response = await axios.get(`${this.base_url}/${username}/${repository}`);
            return response.data;
        }
        catch (error) {
            console.error(error);
        }
    }
    async content(username, repository, path) {
        try {
            const response = await axios.get(`${this.base_url}/${username}/${repository}/contents?path=${path}`);
            return response.data;
        }
        catch (error) {
            console.error(error);
        }
    }
}
