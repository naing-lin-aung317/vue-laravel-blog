
<template>
    <Link v-for="blog in blogs" :key="blog.id" :href="`/blogs/${blog.id}`">
        <h1 class="my-2 underline">{{ blog.title }}</h1>
    </Link>
</template>

<script>
import { Link } from '@inertiajs/vue3';

export default {
    components : {Link},
    props: {
        blogs: {
            type: Array,
        }
    }
}
</script>
