<template>
    <div>
        <h1 :key="blog.id"> {{ blog.title }}-<Link class="underline" :href="`/users/${blog.user?.id}`">{{ blog.user?.name }}</Link></h1>
        <p :key="blog.id"> {{ blog.description }}</p>
        <div class="flex items-center gap-3">
            <Link :href="`/blogs/${blog.id}/edit`">Edit</Link>
            <button type="button" @click="deleteBlog">Delete</button>
        </div>
    </div>
</template>

<script>
import { Link } from '@inertiajs/vue3';

export default {
    components: { Link },
    props: {
        blog: {
            type: Object,
        },
    },
    methods: {
        deleteBlog() {
            this.$inertia.post(`/blogs/${this.blog.id}/delete`);
        },
    },
};
</script>
