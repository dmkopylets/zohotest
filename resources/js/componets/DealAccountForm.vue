<template>
  <div>
    <form @submit.prevent="submitForm">
      <!-- Fields for Deal -->
      <div>
        <label>Deal Name</label>
        <input v-model="deal.name" required />
      </div>
      <div>
        <label>Deal Stage</label>
        <input v-model="deal.stage" required />
      </div>

      <!-- Fields for Account -->
      <div>
        <label>Account Name</label>
        <input v-model="account.name" required />
      </div>
      <div>
        <label>Account Website</label>
        <input v-model="account.website" required />
      </div>
      <div>
        <label>Account Phone</label>
        <input v-model="account.phone" required />
      </div>

      <button type="submit">Submit</button>
    </form>
    <div v-if="successMessage">{{ successMessage }}</div>
    <div v-if="errorMessage">{{ errorMessage }}</div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      deal: {
        name: '',
        stage: '',
      },
      account: {
        name: '',
        website: '',
        phone: '',
      },
      successMessage: '',
      errorMessage: '',
    };
  },
  methods: {
    async submitForm() {
      // Validate form fields
      if (!this.validateForm()) {
        this.errorMessage = 'Please fill in all fields.';
        return;
      }

      // Make AJAX request to Laravel backend
      try {
        const response = await axios.post('/api/createDealAndAccount', {
          deal: this.deal,
          account: this.account,
        });

        // Handle success response
        this.successMessage = 'Deal and Account created successfully.';
        this.errorMessage = '';
        // Clear form fields
        this.deal = {
          name: '',
          stage: '',
        };
        this.account = {
          name: '',
          website: '',
          phone: '',
        };
      } catch (error) {
        // Handle error response
        this.errorMessage = 'Failed to create Deal and Account.';
        this.successMessage = '';
      }
    },
    validateForm() {
      return (
        this.deal.name &&
        this.deal.stage &&
        this.account.name &&
        this.account.website &&
        this.account.phone
      );
    },
  },
};
</script>
