<template>
  <modal-component class="black-text-modal">
    <div slot="header">Journal's Details</div>

    <div slot="body">
      <form>
        <label>Date:{{journal.date}}</label>
        <label>Text: {{journal.text}}</label>
        <label>Plan for tomorrow:{{journal.plan_tomorrow}}</label>
        <label>Goal for tomorrow: {{journal.goal_tomorrow}}</label>
        <div class="form-check mt-2">
          <input
            class="form-check-input"
            id="defaultCheck1"
            name="goal_status"
            type="checkbox"
            v-bind:aria-readonly="journal.goal_status"
          >
          <label class="form-check-label" for="defaultCheck1">Did you achieve today's goal?</label>

        </div>
      </form>
    </div>
  </modal-component>
</template>
<script>
  import Datepicker from "vuejs-datepicker";

  export default {
    props: {
      journal: Object
    },
    components: {
      Datepicker
    },
    data() {
      return {
        journals: [],
        date: null,
        text: null,
        plan_tomorrow: null,
        goal_tomorrow: null,
        goal_status: null
      };
    }
  };
</script>
