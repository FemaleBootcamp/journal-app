<template>
  <tr>
    <td>{{ date }}</td>
    <td>{{ text }}</td>
    <td>{{ plan_tomorrow }}</td>
    <th scope="row">{{ goal_tomorrow }}</th>
    <td>
      <!-- Default unchecked -->
      <div class="custom-control custom-checkbox">
        <input class="custom-control-input" id="defaultUnchecked" type="checkbox">
        <label class="custom-control-label" for="defaultUnchecked">Did you achieve?</label>
      </div>
    </td>

    <td>
      <button class="btn btn-light" type="button">View Details</button>
      <button
        @click="$emit('showEditModal', id)"
        class="btn btn-primary"
        id="show-journal-edit-modal" type="button"
      >Edit
      </button>
      <button
        @click="$emit('showDeleteModal', id)"
        class="btn btn-danger"
        id="show-journal-delete-modal"
        type="button"
      >Delete
      </button>
    </td>
  </tr>
</template>
<script>
  export default {
    props: ["id", "date", "text", "plan_tomorrow", "goal_tomorrow", "grade"]
  };
</script>
