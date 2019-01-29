<template>
  <modal-component class="black-text-modal">
    <div slot="header">Edit Journal</div>

    <div slot="body">
      <form @submit="$emit(edit())">
        <datepicker class="form-control"
                    name="date"
                    placeholder="Date"
                    v-model="date">
        </datepicker>
        <input
          class="form-control mt-2"
          name="database_column"
          placeholder="Text"
          type="text"
          v-model="text"
        ><textarea
        class="form-control mt-2"
        id="exampleFormControlTextarea1"
        name="plan_tomorrow"
        placeholder="Plan for next day "
        rows="3"
        v-model="plan_tomorrow"
      ></textarea>
        <input
          class="form-control mt-2"
          name="goal_tomorrow"
          type="text"
          v-model="goal_tomorrow"
        >
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
          <span><p v-for="message in messages" :key="message">{{ message }}</p></span>
        </div>
      </form>
    </div>

    <div slot="footer">
      <button @click="$emit('close')" class="btn btn-danger modal-default-button">Cancel</button>
      <button
        @click="$emit('edit', editJournalId,date, text, plan_tomorrow, goal_tomorrow, goal_status)"
        class="btn btn-primary modal-default-button mr-2"
        type="submit"
      >Save
      </button>
    </div>
  </modal-component>
</template>
<script>
  import Datepicker from "vuejs-datepicker";

  export default {
    props: ["editJournalId", "user_id", "date", "text", "plan_tomorrow", "goal_tomorrow", "goal_status", "messages"],
    components: {
      Datepicker
    },
  };
</script>
