export default function alumni({ next, store }) {
    if (store.state.role !== 'alumni' && store.state.role !== undefined) next('/');
    else next();
}