export default function admin({ next, store }) {
    if (store.state.role !== 'admin') next('/');
    else next();
}