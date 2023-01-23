// axios
import axios from "axios";

export default class RepositoriesApi {
    base_url = "/api/repositories";

    async all(id) {
        return this.sendAll(id);
    }

    async find(username, repository) {
        try {
            const response = await axios.get(`${this.base_url}/${username}/${repository}`);
            return response.data;
        } catch (error) {
            console.error(error);
        }
    }

    async content(username, repository, path = "") {
        return this.getContentsFromApi(username, repository, path);
    }

    async getContentsFromApi(username, repository, path)
    {
        return new Promise((resolve, reject) => {
            axios.get(`${this.base_url}/${username}/${repository}/contents?path=${path}`)
                .then(response => {
                    resolve(response.data);
                })
                .catch(error => {
                    console.error(error);
                });
        })
    }
    // get new repositories and store them in the local storage.
    async sendAll(id){
        return new Promise((resolve, reject) => {
            axios.get(`${this.base_url}/${id}`)
                .then(response => {

                    resolve(response.data);
                })
                .catch(error => {
                    console.error(error);
                });

        });
    }
}
