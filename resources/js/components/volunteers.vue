<template>
    <div>
        <div class="row text-center  justify-content-around">
            <div v-for="volunteer in volunteers" :key="volunteer.id" class="col-sm-4 mt-3">
                <div class="card">
                    <!-- Card body -->
                    <div class="card-body">
                        <a href="javascript:;">
                            <img class="rounded-circle img-center img-fluid shadow shadow-lg--hover"
                                 src="https://demos.creative-tim.com/argon-dashboard-pro/assets/img/theme/team-1.jpg"
                                 style="width: 140px;">
                        </a>
                        <div class="pt-4 text-center">
                            <h5 class="h3 title">
                                <span class="d-block mb-1">{{ volunteer.name }}</span>
                                <small class="h4 font-weight-light d-block">
                                    <span v-if="volunteer.isAvailable" class="badge badge-success">
                                        {{ volunteer.timing }}
                                    </span>
                                    <span v-else class="badge badge-primary"> {{ volunteer.timing }} </span>
                                </small>
                                <small class="h4 font-weight-light text-muted">{{ volunteer.contact }}</small>
                            </h5>
                            <div class="mt-3">
                                <a class="btn btn-twitter btn-icon-only rounded-circle" href="javascript:;">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a class="btn btn-facebook btn-icon-only rounded-circle" href="javascript:;">
                                    <i class="fab fa-facebook"></i>
                                </a>
                                <a class="btn btn-dribbble btn-icon-only rounded-circle" href="javascript:;">
                                    <i class="fab fa-dribbble"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div v-if="volunteers.length === 0" class="section">
                    <p>{{ noProductLabel }}</p>
                </div>

            </div>

        </div>
    </div>
</template>

<script>

export default {
    name: "volunteers",

    data() {
        return {
            id: '',
            noProductLabel: 'No volunteers found',
        };
    },

    computed: {
        isUserLogged() {
            return this.$store.getters.isUserLoggedIn;
        },
        volunteers() {
            if (this.$store.state.userInfo.hasSearched) {
                return this.getProductByTitle();
            } else {
                return this.$store.state.volunteers;
            }
        }
    },

}
</script>

<style scoped>
* {
    box-sizing: unset !important;
}
</style>
