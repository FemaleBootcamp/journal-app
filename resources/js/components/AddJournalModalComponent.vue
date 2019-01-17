<template>
  <modal-component style="color:black">
    <div slot="header">Add new record</div>

    <div slot="body">
      <form @submit="$emit(createJournal())">
        <input id="user_id" v-model="userid" name="user_id" type="hidden">
        <datepicker
          v-model="date"
          name="date"
          placeholder="Date"
          class="form-control"
        ></datepicker>
        <input
          v-model="text"
          name="database_column"
          class="form-control mt-2"
          type="text"
          placeholder="Text"
        >
        <textarea
          v-model="plan_tomorrow"
          name="plan_tomorrow"
          class="form-control mt-2"
          id="exampleFormControlTextarea1"
          rows="3"
          placeholder="Plan for next day "
        ></textarea>
        <input
          v-model="goal_tomorrow"
          name="goal_tomorrow"
          class="form-control mt-2"
          type="text"
          placeholder="Goal for tomorrow"
        >
        <div class="form-check mt-2">
          <input
            v-model="goal_status"
            name="goal_status"
            class="form-check-input"
            type="checkbox"
            value
            id="defaultCheck1"
          >
          <label class="form-check-label" for="defaultCheck1">Did you achieve today's goal?</label>
        </div>
      </form>
    </div>

    <div slot="footer">
      <button class="btn btn-danger modal-default-button" @click="$emit('close')">Cancel</button>
      <button
        type="submit"
        @click="$emit('createJournal', date, text, plan_tomorrow, goal_tomorrow,goal_status)"
        class="btn btn-primary modal-default-button mr-2"
      >Save</button>
    </div>
  </modal-component>
</template>

<script>
import Datepicker from "vuejs-datepicker";
export default {
  components: {
    Datepicker
  },
  data() {
    return {
      userid:null,
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