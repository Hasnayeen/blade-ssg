@props(['content' => ''])
<aside 
    x-data="{
        content: @js($content),
        links: [],
        init () {
            const doc = new DOMParser().parseFromString(this.content, 'text/html');
            this.links = Array
                .from((doc).querySelectorAll('h1, h2, h3'))
                .map(link => ({
                    href: '#' + link.id,
                    level: link.tagName,
                    text: link.textContent.replace(/^#/, '')
                }));
        }
    }"
    class="relative"
>
    <div class="sticky top-24">
        <h2 class="text-sm text-slate-700 font-medium">On this page</h2>
        <ul class="space-y-4 text-gray-600">
            <template x-for="link in links" :key="link.text">
                <li :class="{ 'pl-4': !['H1', 'H2'].includes(link.level) }">
                    <a :href="link.href" x-text="link.text" class="hover:text-cream-500"></a>
                </li>
            </template>
        </ul>
    </div>
</aside>
