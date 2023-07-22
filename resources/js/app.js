import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';

import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';

window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();
