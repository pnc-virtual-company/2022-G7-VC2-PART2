import { createApp } from 'vue'
import './style.css'
import App from './App.vue'
import router from './router'
import './axios-http';
import VueCookies from 'vue-cookies'
import { store } from './stores/userInfo';
import middleware from "vue-router-middleware-system"
import ClickOutside from './helper/click-outside'

import BaseNavigationBar from './components/nav/BaseNavigationBar.vue'
import UserNavigationBar from './components/nav/UserNavigationBar.vue'
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
import CardWidget from './components/widgets/Card/CardWidget.vue'
import BaseCard from './components/widgets/Card/BaseCard.vue'
import NextIcon from './components/widgets/IconWidgets/NextIcon.vue'
import BackIcon from './components/widgets/IconWidgets/BackIcon.vue'
import GeneralInfo from './components/profile/alumni/GeneralInfo.vue'
import HeaderCard from './components/widgets/Card/HeaderCard.vue'
import SkillsContent from './components/profile/alumni/SkillsContent.vue'
import CopyIcon from "./components/widgets/IconWidgets/CopyIcon.vue"
import ChevronIcon from "./components/widgets/IconWidgets/ChevronUpIcon.vue"
import InformationIcon from './components/widgets/IconWidgets/InformationIcon.vue'
import CheckIcon from './components/widgets/IconWidgets/CheckIcon.vue'
import MinusIcon from './components/widgets/IconWidgets/MinusIcon.vue'
import BasePanel from './components/widgets/accodion/BasePanel.vue';
import InputField from './components/widgets/InputField/InputField.vue'
import BaseButton from './components/widgets/Button/BaseButton.vue'
import EyeOpen from './components/widgets/IconWidgets/EyeOpen.vue'
import EyeClose from './components/widgets/IconWidgets/EyeClose.vue'
import GroupUser from './components/widgets/IconWidgets/GroupUser.vue'
import SingleUser from './components/widgets/IconWidgets/SingleUser.vue'
import LogoutIcon from './components/widgets/IconWidgets/LogoutIcon.vue'
import EroIcon from './components/widgets/IconWidgets/EroIcon.vue'
import InfoIcon from './components/widgets/IconWidgets/InfoIcon.vue'
import PlusIcon from './components/widgets/IconWidgets/PlusIcon.vue'
import FormWidget from './components/widgets/form/FormWidget.vue'
import InputPasswordConfirm from './components/form/InputPasswordConfirm.vue'
import UserIcon from './components/widgets/IconWidgets/UserIcon.vue'
import KeyIcon from './components/widgets/IconWidgets/KeyIcon.vue'
import TotalUserIcon from './components/widgets/IconWidgets/TotalUserIcon.vue'
import ShowDetailCard from './components/widgets/Card/ShowDetailCard.vue'
import AlumniIcon from './components/widgets/IconWidgets/AlumniIcon.vue'




const app = createApp(App)
app.use(router)
app.use(store)
app.use(ClickOutside)
app.use(VueCookies, { expire: '1d'})
router.beforeEach(middleware({ store }))


app.component('base-nav', BaseNavigationBar)
app.component('user-nav', UserNavigationBar)
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
app.component('general-info-body',GeneralInfo)
app.component('header-card',HeaderCard)
app.component('skill-content',SkillsContent)
app.component('copy-icon',CopyIcon)
app.component('info-icon',InformationIcon)
app.component('input-field',InputField)
app.component('base-button',BaseButton)
app.component('eye-open',EyeOpen)
app.component('eye-close',EyeClose)
app.component('group-user',GroupUser)
app.component('single-user',SingleUser)
app.component('logout-icon',LogoutIcon)
app.component('ero-icon',EroIcon)
app.component('info-icon',InfoIcon)
app.component('plus-icon',PlusIcon)
app.component('form-widget',FormWidget)
app.component('input-pwConfirm',InputPasswordConfirm)
app.component('check-icon',CheckIcon)
app.component('minus-icon',MinusIcon)
app.component('base-panel',BasePanel)
app.component('chevron-up-icon',ChevronIcon)
app.component('user-icon',UserIcon)
app.component('key-icon',KeyIcon)
app.component('total-user-icon',TotalUserIcon)
app.component('user-detail-card',ShowDetailCard)
app.component('alumni-icon',AlumniIcon)

app.mount('#app')
