export default function ero({ next, store }) {
    if (store.state.role !== 'ero' && store.state.role !== undefined) next('/');
    else next();
}