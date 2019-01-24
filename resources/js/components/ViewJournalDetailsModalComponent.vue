<template>
  <modal-component class="black-text-modal">
    <div slot="header">Journal Details</div>


    <div slot="body">
      <p>Date: {{date}}</p>
      <p>Text: {{text}}</p>
      <p>Date: {{date}}</p>
      <p>Plan for Tomorrow: {{plan_tomorrow}}</p>
      <p>Goal for Tomorrow: {{goal_tomorrow}}</p>

      <div class="form-check mt-2">
        <input
          class="form-check-input"
          id="defaultCheck1"
          name="goal_status"
          type="checkbox"
          v-model="goal_status"
          value
        >
        <label class="form-check-label" for="defaultCheck1">Did you achieve today's goal?</label>

      </div>
    </div>

    <div slot="footer">
      <button @click="$emit('close')" class="btn btn-danger modal-default-button">Close</button>
    </div>
  </modal-component>
</template>
<script>
  import Datepicker from "vuejs-datepicker";

  export default {
    props: ["editJournalId", "user_id", "date", "text", "plan_tomorrow", "goal_tomorrow", "goal_status"],
    components: {
      Datepicker
    },
    data() {
      return {
        journals: [],
        id: null
      };
    }
  };
</script>
<style>
  .btn {
    alignment: left;
  }
</style>
