<template>
  <modal-component class="black-text-modal">
    <div slot="header">Journal Details</div>
    <div class="form" slot="body">
      <h5><span>Date:</span> {{date}}</h5>
      <h5><span>Text:</span> {{text}}</h5>
      <h5><span>Plan for Tomorrow: </span>{{plan_tomorrow}}</h5>
      <h5><span>Goal for Tomorrow: </span>{{goal_tomorrow}}</h5>

      <div class="form-check mt-2">
        <input
          class="form-check-input"
          id="defaultCheck1"
          name="goal_status"
          type="checkbox"
          v-model="goal_status"
          value
        >
        <span class="form-check-label" for="defaultCheck1">Did you achieve today's goal?</span>
      </div>
    </div>
    <div slot="footer">
      <button @click="$emit('close')" class="close-btn btn btn-danger modal-default-button">Close</button>
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
  };
</script>
<style>
  .close-btn {
    alignment: left;
  }
</style>
