import qs from 'qs'

export default class Strapi {
  constructor () {
    this.apiURL = 'https://cms.alteaparticipa.es/';
  }

  getAssociationCategories () {
    return this._call('get', 'association-categories');
  }

  getAssociationDocuments (locale) {
    return this._call('get', 'associacions-documents/?_sort=title:ASC&language_in=all&language_in=' + locale);
  }

  getAssociations (limit) {
    return this._call('get', `associations/?_limit=${limit}`);
  }

  getAssociation (slug) {
    return this._call('get', `associations/?slug=${slug}`);
  }

  getPage (title) {
    return this._call('get', `pagines/?slug=${title}`);
  }

  getOpenProcesses () {
    const query = qs.stringify({ 
      _where: [
        { _or: [{ archived_null: true }, { archived: false }] },
        { _or: [{ autoarchive_null: true }, { autoarchive_gte: this._now() }] },
      ]
    })
    return this._call('get', 'altea-decideix/?' + query)
  }

  getArchivedProcesses () {
    const query = qs.stringify({ 
      _where: [
        { _or: [{ archived: true }, { autoarchive_lt: this._now() }] },
      ],
      _sort: 'createdBy:ASC'
    })
    return this._call('get', 'altea-decideix/?' + query)
  }

  getOpenActivities () {
    const query = qs.stringify({ end_date_gte: this._now() })
    return this._call('get', 'activitats/?' + query)
  }

  getArchivedActivities () {
    const query = qs.stringify({ end_date_lt: this._now() })
    return this._call('get', 'activitats/?' + query)
  }

  getDocuments (locale) {
    return this._call('get', 'documents/?_sort=title:ASC&language_in=all&language_in=' + locale);
  }

  _now () {
    const d = new Date()
    return d.getFullYear() + '-' + ('0' + (d.getMonth()+1)).slice(-2) + '-' + ('0' + d.getDate()).slice(-2)
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
