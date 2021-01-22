export default class Strapi {
  constructor () {
    this.apiURL = 'https://cms.alteaparticipa.es/';
  }

  getAssociationCategories () {
    return this._call('get', 'association-categories');
  }

  getAssociation (slug) {
    return this._call('get', `associations/?slug=${slug}`);
  }

  _call(type, url, data) {
    return new Promise((resolve, reject) => {
      axios[type](this.apiURL + url, data).then(response => {
        resolve(response.data);
      }).catch(error => {
        if(error.response.status == 500) {
          reject({
            'error': ['Error del sistema. És possible que aquest error siga temporal. Refresca la pàgina i torna a intentar-ho o posa\'t en contacte.']
          });
        } else if(error.response.data.hasOwnProperty('errors')){
          reject(error.response.data.errors);
        } else {
          reject(error.response.data);
        }
      });
    });
  }
}
