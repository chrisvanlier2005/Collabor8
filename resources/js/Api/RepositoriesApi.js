// axios
import axios from "axios";

export default class RepositoriesApi {
    base_url = "/api/repositories";

    async all(id) {
        if (localStorage.getItem("repositories") !== null && localStorage.getItem("repositories") !== undefined && localStorage.getItem("repositories") !== "") {
            let repositories = JSON.parse(localStorage.getItem("repositories"));
            console.log(repositories[0].owner.login)
            if (repositories[0].owner.login === id) {
                return repositories;
            } else {
                return this.sendAll(id);
            }
        } else {
            return this.sendAll(id);
        }
    }

    async find(username, repository) {
        try {
            const response = await axios.get(`${this.base_url}/${username}/${repository}`);
            return response.data;
        } catch (error) {
            console.error(error);
        }
    }

    async content(username, repository, path) {
        try {
            const response = await axios.get(`${this.base_url}/${username}/${repository}/contents?path=${path}`);
            return response.data;
        } catch (error) {
            console.error(error);
        }
    }



    async sendAll(id){
        return new Promise((resolve, reject) => {
            axios.get(`${this.base_url}/${id}`)
                .then(response => {
                    let repositoriesToStore = [];
                    response.data.forEach(repository => {
                        let repositoryToStore = {
                            id: repository.id,
                            name: repository.name,
                            description: repository.description,
                            owner: {
                                login: repository.owner.login,
                            }
                        }
                        repositoriesToStore.push(repositoryToStore);
                    });
                    localStorage.setItem("repositories", JSON.stringify(repositoriesToStore));
                    resolve(response.data);
                })
                .catch(error => {
                    console.error(error);
                });

        });
    }
}
