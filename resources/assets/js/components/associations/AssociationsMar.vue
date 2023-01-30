<template>
  <aside class="mar">
    <i class="far fa-fw fa-house-flood" />
    <h2>La Mar d'Associacions</h2>
    <p>Espai per a les Associacions</p>
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

    <button
      v-b-modal.modal-form
      :class="['btn btn-block btn-main', { 'btn-outline-primary': tab !== 'form', 'btn-primary': tab === 'form'}]">
      <i class="far fa-bookmark"></i> Reserva la sala d'usos múltiples
    </button>
    <button
      v-b-modal.modal-calendar
      :class="['btn btn-block', { 'btn-outline-primary': tab !== 'calendar', 'btn-primary': tab === 'calendar'}]">
      <i class="far fa-calendar-alt"></i> Calendari de disponibilitat
    </button>

    <b-modal id="modal-calendar" size="lg" ok-only ok-title="Tanca" title="Calendari de disponibilitat">
      <iframe src="https://calendar.google.com/calendar/embed?src=reserva.sala.altea%40gmail.com&ctz=Europe%2FMadrid" style="border: 0" width="100%" height="600" frameborder="0" scrolling="no"></iframe>
    </b-modal>

    <b-modal id="modal-form" size="lg" ok-only ok-title="Tanca" title="Reserva la sala d'usos múltiples">
      <iframe src="https://docs.google.com/forms/d/e/1FAIpQLScFl0I0z6C0pblR4lnZO7yP2lvJWi1Z6yIzNS4HQ9Rvh_RGjA/viewform?embedded=true" width="100%" height="2000" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe>
    </b-modal>
  </aside>
</template>

<script>
  import AssociationCategory from './AssociationCategory';

  export default {
    components: {
        AssociationCategory
    }
  }
</script>

<style lang="scss" scoped>
@import '../../../sass/_variables';

.mar {
  color: $brand-primary;

  .fa-house-flood {
    font-size: 2rem;
  }

  h2 {
    font-weight: 900;
    font-size: 1.75rem;
  }

  .btn {
    display: flex;
    margin-bottom: .5rem;
    text-align: left;
    gap: .5rem;
    align-items: baseline;

    &-main {
      font-weight: bold;
    }
  }
}
</style>