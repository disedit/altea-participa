import qs from 'qs'

export default class Strapi {
  constructor () {
    this.apiURL = 'https://cms.alteaparticipa.es/';
  }

  getAssociationCategories () {
    return this._call('get', 'association-categories');
  }

  getAssociations (limit) {
    return this._call('get', `associations/?_limit=${limit}`);
  }

  getAssociation (slug) {
    return this._call('get', `associations/?slug=${slug}`);
  }

  getOpenProcesses () {
    const d = new Date()
    const date = d.getFullYear() + '-' + ('0' + (d.getMonth()+1)).slice(-2) + '-' + ('0' + d.getDate()).slice(-2)
    const query = qs.stringify({ 
      _where: [
        { archived_null: true },
        { _or: [{ autoarchive_null: true }, { autoarchive_gte: date }] },
      ]
    })
    return this._call('get', 'altea-decideix/?' + query)
  }

  getArchivedProcesses () {
    const d = new Date()
    const date = d.getFullYear() + '-' + ('0' + (d.getMonth()+1)).slice(-2) + '-' + ('0' + d.getDate()).slice(-2)
    const query = qs.stringify({ 
      _where: [
        { _or: [{ archived: true }, { autoarchive_lt: date }] },
      ]
    })
    return this._call('get', 'altea-decideix/?' + query)
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
