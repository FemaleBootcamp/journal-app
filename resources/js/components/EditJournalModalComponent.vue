<template>
  <modal-component class="black-text-modal">
    <div slot="header">Edit Journal</div>

    <div slot="body">
      <form @submit="$emit(createJournal())">
        <datepicker class="form-control"
                    name="date"
                    placeholder="Date"
                    v-model="journal.date">
        </datepicker>
        <input
          class="form-control mt-2"
          name="database_column"
          placeholder="Text"
          type="text"
          v-model="journal.text"
        ><textarea
        class="form-control mt-2"
        id="exampleFormControlTextarea1"
        name="plan_tomorrow"
        placeholder="Plan for next day "
        rows="3"
        v-model="journal.plan_tomorrow"
      ></textarea>
        <input
          class="form-control mt-2"
          name="goal_tomorrow"
          type="text"
          v-model="journal.goal_tomorrow"
        >
        <div class="form-check mt-2">
          <input
            class="form-check-input"
            id="defaultCheck1"
            name="goal_status"
            type="checkbox"
            v-model="journal.goal_status"
            value
          >
          <label class="form-check-label" for="defaultCheck1">Did you achieve today's goal?</label>

        </div>
      </form>
    </div>

    <div slot="footer">
      <button @click="$emit('close')" class="btn btn-danger modal-default-button">Cancel</button>
      <button
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
