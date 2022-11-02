<template>
  <association-category :category="{
    cat_name: `Espai per a les Associacions La Mar d'Associacions`,
    cat_name_es: `Espacio para las Asociaciones La Mar d'Associacions`,
    cat_name_en: `Space for associations La Mar d'Associacions`,
    cat_slug: 'mar',
    icon: 'house-flood',
    associations: []
    }">
    <p>
      La <strong>Mar d'Associacions</strong> és un edifici de titularitat municipal amb més de 8 sales, de les quals
      7 es reserven a les associacions sol·licitants durant un període de 2 anys i son autogestionades
      per les associacions.
      Les associacions interessades a la reserva d’aquesta sala han de sol·licitar per registre d'entrada
      la seua petició o enviar un email a <a href="mailto:participacio@altea.es">participacio@altea.es</a>
    </p>

    <p>
      D’altra banda, hi ha disponible una <strong>sala d’usos múltiples</strong> on qualsevol associació
      inscrita en el Registre d’Associacions d’Altea podrà reunir-se si sol·licita prèviament la seua ocupació.
    </p>

    <p>
      <a
        href="#"
        @click.prevent="tab = 'form'"
        :aria-pressed="tab === 'form' ? 'true' : 'false'"
        :class="['btn', { 'btn-outline-primary': tab !== 'form', 'btn-primary': tab === 'form'}]">
        <i class="far fa-bookmark"></i> Reserva la sala d'usos múltiples
      </a>
      <a
        href="#"
        @click.prevent="tab = 'calendar'"
        :aria-pressed="tab === 'calendar' ? 'true' : 'false'"
        :class="['btn', 'ml-2', { 'btn-outline-primary': tab !== 'calendar', 'btn-primary': tab === 'calendar'}]">
        <i class="far fa-calendar-alt"></i> Calendari de disponibilitat
      </a>
    </p>

    <div v-if="tab === 'calendar'">
      <iframe src="https://calendar.google.com/calendar/embed?src=reserva.sala.altea%40gmail.com&ctz=Europe%2FMadrid" style="border: 0" width="100%" height="600" frameborder="0" scrolling="no"></iframe>
    </div>

    <div v-if="tab === 'form'">
      <iframe src="https://docs.google.com/forms/d/e/1FAIpQLScFl0I0z6C0pblR4lnZO7yP2lvJWi1Z6yIzNS4HQ9Rvh_RGjA/viewform?embedded=true" width="100%" height="2000" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe>
    </div>
  </association-category>
</template>

<script>
  import AssociationCategory from './AssociationCategory';

  export default {
    components: {
        AssociationCategory
    },

    data () {
        return {
            tab: null
        }
    }
  }
</script>

<style lang="scss" scoped>

</style>