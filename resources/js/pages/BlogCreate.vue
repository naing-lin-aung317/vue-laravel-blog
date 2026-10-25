
<template>
    <div class="max-w-lg mx-auto mt-10 p-6 bg-white rounded-xl shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Blog Form</h1>

        <form @submit.prevent="createBlog">
            <div class="mb-4">
                <input
                    v-model="title"
                    type="text"
                    placeholder="Title"
                    class="w-full p-3 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>
            <div class="text-red-400">
                {{ $page.props.errors?.title }}
            </div>

            <div class="mb-4">
                <textarea
                    v-model="description"
                    placeholder="Description"
                    rows="6"
                    class="w-full p-3 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500"
                ></textarea>
            </div>
            <div class="text-red-400">
                {{ $page.props.errors?.description }}
            </div>

            <button
                type="submit"
                class="px-5 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition"
            >
                Create Blog
            </button>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            title: "",
            description: "",
        };
    },
    methods: {
        createBlog() {
            let data={
                title: this.title,
                description: this.description,
            };

            this.$inertia.post("/blogs/store",data)
        },
    },
};
</script>
