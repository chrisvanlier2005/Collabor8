// axios
import axios from "axios";

export default class RepositoriesApi {
    base_url = "/api/repositories";

    async all(id) {
        if (localStorage.getItem("repositories") !== null && localStorage.getItem("repositories") !== undefined && localStorage.getItem("repositories") !== "") {
            let repositories = JSON.parse(localStorage.getItem("repositories"));
            if (repositories.length > 0 && repositories[0].owner.login === id) {
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

    async content(username, repository, path = "") {
        if (localStorage.getItem("contents") !== null || localStorage.getItem("contents") !== undefined){
            let contents = JSON.parse(localStorage.getItem("contents"));
            if(contents.length > 0 && contents[0].repository === repository){
                return contents;
            }else{
                return this.getContentsFromApi(username, repository, path);
            }
        }
    }

    async getContentsFromApi(username, repository, path)
    {
        return new Promise((resolve, reject) => {
            axios.get(`${this.base_url}/${username}/${repository}/contents?path=${path}`)
                .then(response => {
                    let contentsToStore = [];
                    response.data.forEach(content => {
                        let contentToStore = {
                            name: content.name,
                            path: content.path,
                            type: content.type,
                            repository: repository,
                        }
                        contentsToStore.push(contentToStore);
                    });
                    localStorage.setItem("contents", JSON.stringify(contentsToStore));
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
                    let repositoriesToStore = [];
                    response.data.forEach(repository => {
                        let repositoryToStore = {
                            id: repository.id,
                            name: repository.name,
                            description: repository.description,
                            owner: {
                                login: repository.owner.login,
                                avatar_url: repository.owner.avatar_url,
                            },
                            private: repository.private,
                            language: repository.language,

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
