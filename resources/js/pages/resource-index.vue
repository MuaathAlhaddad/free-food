<template>
    <div class="container mb-5">
        <div class="nav-wrapper">
            <ul id="tabs-icons-text" class="nav nav-pills nav-fill flex-column flex-md-row" role="tablist">
                <li class="nav-item">
                    <a id="tabs-icons-text-1-tab" aria-controls="tabs-icons-text-1" aria-selected="true"
                       class="nav-link mb-sm-3 mb-md-0 active" data-toggle="tab" href="#tabs-icons-text-1"
                       role="tab">Foods</a>
                </li>
                <li class="nav-item">
                    <a id="tabs-icons-text-2-tab" aria-controls="tabs-icons-text-2" aria-selected="false"
                       class="nav-link mb-sm-3 mb-md-0" data-toggle="tab" href="#tabs-icons-text-2" role="tab">Volunteers</a>
                </li>
            </ul>
        </div>

        <div id="myTabContent" class="tab-content">
            <div id="tabs-icons-text-1" aria-labelledby="tabs-icons-text-1-tab" class="tab-pane fade show active"
                 role="tabpanel">

                <products/>

            </div>
            <div id="tabs-icons-text-2" aria-labelledby="tabs-icons-text-2-tab" class="tab-pane fade" role="tabpanel">

                <volunteers/>

            </div>
        </div>
    </div>
</template>

<script>
import products from "../components/products";
import volunteers from "../components/volunteers";
export default {
    name: "resource-index",
    components: {
        products,
        volunteers
    }
}
</script>

<style lang="scss" scoped>
.card {
    margin: 5px;
}
</style>
