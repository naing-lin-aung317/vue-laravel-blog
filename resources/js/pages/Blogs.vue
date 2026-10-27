
<template>
    <h1 v-if="user" class="text-3xl font-bold">Blogs of {{ user.name }}</h1>
    <Link v-for="blog in blogs" :key="blog.id" :href="`/blogs/${blog.id}`">
        <h1 class="my-2 underline">{{ blog.title }}-{{ blog.user?.name }}-{{ user?.nrc?.township }}-{{ user?.nrc?.number }}</h1>
    </Link>
</template>

<script>
import { Link } from '@inertiajs/vue3';

export default {
    components : {Link},
    props: {
        blogs: {
            type: Array,
        },
        user:{
            type: Object,
        }

    }
}
</script>
