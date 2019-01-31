<template>
  <tr>
    <td>{{ date }}</td>
    <td>{{ text }}</td>
    <td>{{ plan_tomorrow }}</td>
    <td>{{ goal_tomorrow }}</td>
    <td>
      <!-- Default unchecked -->
      <div class="custom-control custom-checkbox">
        <input
          disabled
          type="checkbox"
          class="custom-control-input"
          id="status"
          :checked="goal_status"
        >
        <label class="custom-control-label" for="status">Did you achieve?</label>
      </div>
    </td>

    <td>
      <button class="btn btn-light"
        @click="$emit('showDetailsModal', id)"
        type="button"
        id="show-journal-details-modal"
      >View Details</button>
      <button class="btn btn-info text-white"
        @click="$emit('showEditModal', id)"
        id="show-journal-edit-modal"
        type="button"
      >Edit
      </button>
      <button
        id="show-journal-delete-modal"
        type="button"
        @click="$emit('showDeleteModal', id)"
        class="btn btn-danger"
      >
        <i class="fa fa-trash"></i>
      </button>

    </td>
  </tr>
</template>
<script>
export default {
  props: ["id", "date", "text", "plan_tomorrow", "goal_tomorrow", "goal_status"]
};
</script>
