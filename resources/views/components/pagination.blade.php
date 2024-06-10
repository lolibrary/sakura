<ul class="pagination justify-content-center" v-if="data.total > data.per_page">
  <li class="page-item pagination-prev-nav" :class="{ 'disabled': !data.next_page_url }">
    <a class="page-link" href="#" aria-label="Previous" @click.prevent="selectPage(--data.current_page)">
      <slot name="prev-nav">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </slot>
    </a>
  </li>
  <li class="page-item pagination-page-nav" v-for="n in getPages()" :class="{ 'active': n === data.current_page }">
    <a class="page-link" href="#" @click.prevent="selectPage(n)">{{ n }}</a>
  </li>
  <li class="page-item pagination-next-nav" :class="{ 'disabled': !data.next_page_url }">
    <a class="page-link" href="#" aria-label="Next" @click.prevent="selectPage(++data.current_page)">
      <slot name="next-nav">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </slot>
    </a>
  </li>
</ul>