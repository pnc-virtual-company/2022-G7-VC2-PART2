export default function adminAndEro({ next, store }) {
    if (store.state.role !== 'admin' && store.state.role !== 'ero') next('/');
    else next();
}