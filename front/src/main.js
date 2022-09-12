import { createApp } from 'vue'
import './style.css'
import App from './App.vue'
import router from './router'
import EditIcon from './components/widgets/IconWidgets/EditIcon.vue'
import AddIcon from './components/widgets/IconWidgets/AddIcon.vue'
import CamaraIcon from './components/widgets/IconWidgets/CamaraIcon.vue'
import ManIcon from './components/widgets/IconWidgets/ManIcon.vue'
import AcademicIcon from './components/widgets/IconWidgets/AcademicIcon.vue'
import BackgroundWidget from './components/widgets/Button/BackgroundWidget.vue'
import MailIcon from './components/widgets/IconWidgets/MailIcon.vue'
import PhoneIcon from './components/widgets/IconWidgets/PhoneIcon.vue'
import PointIcon from './components/widgets/IconWidgets/PointIcon.vue'
import CancelIcon from './components/widgets/IconWidgets/CancelIcon.vue'
import CardWidget from './components/widgets/Card/cardWidget.vue'
import BaseCard from './components/widgets/Card/BaseCard.vue'
import NextIcon from './components/widgets/IconWidgets/NextIcon.vue'
import BackIcon from './components/widgets/IconWidgets/BackIcon.vue'




const app = createApp(App)
app.use(router)
app.component('edit-icon', EditIcon)
app.component('add-icon',AddIcon)
app.component('camara-icon',CamaraIcon)
app.component('man-icon',ManIcon)
app.component('academic-icon',AcademicIcon)
app.component('background-widget',BackgroundWidget)
app.component('mail-icon',MailIcon)
app.component('phone-icon',PhoneIcon)
app.component('point-icon',PointIcon)
app.component('cancel-icon',CancelIcon)
app.component('card-widget',CardWidget)
app.component('base-card',BaseCard)
app.component('next-icon',NextIcon)
app.component('back-icon',BackIcon)
.mount('#app')
