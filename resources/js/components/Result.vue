<template>
<div class="card">
    <div class="card-body text-center">
        <p class="mb-0 no-wrap" :title="item.english_name"
            style="white-space: nowrap; overflow-x: hidden; text-overflow: ellipsis;">
            <a :href="item.url">{{ item.english_name }}</a>
        </p>
        <p class="text-muted small"
            style="white-space: nowrap; overflow-x: hidden; text-overflow: ellipsis;"
            :title="item.foreign_name">
            {{ item.foreign_name ? item.foreign_name : '&nbsp;' }}
        </p>
        <p class="text-muted itemnum"
            style="white-space: nowrap; overflow-x: hidden; text-overflow: ellipsis;"
            :title="item.product_number">
            {{ item.product_number ? item.product_number : '&nbsp;' }}
        </p>

        <div class="text-center item-image-container">
            <a :href="item.url">
                <img :src="item.image" class="mw-100 mh-100 rounded my-auto mx-auto" onerror="if (this.src !== window.defaultImage) this.src = window.defaultImage">
            </a>
        </div>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item py-1 px-3">
            <div class="d-flex small">
                <p class="p-0 m-0 text-center flex-fill" style="white-space: nowrap; overflow-x: ellipsis;">
                    <a :href="item.brand.url" :title="item.brand.name">
                        {{ item.brand.name }}
                    </a>
                </p>
            </div>
            <div class="d-flex small">
                <p class="p-0 m-0 text-center small flex-fill" style="white-space: nowrap; overflow-x: hidden;">
                    <a v-for="category in item.categories" :href="category.url" :title="category.name" class="category">
                        {{ category.name }}
                    </a>
                </p>
            </div>
        </li>
    </ul>
    <a class="btn btn-outline-primary rounded-0" style="border: none;" :href="item.url">
        View Item
    </a>
    <a v-if="user.level >= 100" class=" btn btn-outline-primary rounded-0" style="border: none;" :href="item.edit_url">
        Edit Item
    </a>
</div>

</template>

<script>
export default {
  props: {
    item: {
      type: Object,
      default() {
        return {
          id: "",
          slug: "",
          url: "",
          edit_url: "",
          english_name: "",
          foreign_name: "",
          product_number: "",
          brand: {
            image: "",
            name: "",
            short_name: "",
            slug: "",
          },
          category: {name: "", slug: "", image: "", url: ""},
          tags: [],
          features: [],
          colors: [],
          attributes: [],
          year: null,
          image: "",
          notes: "",
          price_details: {
            currency: "jpy",
            formatted: "",
            local_price: "",
            price: 0,
          },
          created_at: null,
          published_at: null,
          updated_at: null,
        };
      },
    },
    user: {
        username: "",
        level: 0,
    },
  },


};
</script>
