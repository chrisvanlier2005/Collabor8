export default class UsersApi {
    base_url = "/api/github/users";
    async search(name){
        return new Promise((resolve, reject) => {
            axios.get((`${this.base_url}?username=${name}`))
                .then(response => {
                    resolve(response.data);
                })
                .catch(error => {
                    reject(error);
                });
        });
    }
    async getUsers(name){
        return new Promise((resolve, reject) => {
            axios.get((`${this.base_url}/${name}`))
                .then(response => {
                    resolve(response.data);
                })
                .catch(error => {
                    reject(error);
                });
        });
    }
}
