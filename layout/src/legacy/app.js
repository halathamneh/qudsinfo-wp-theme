import './vendorsInit';
import * as fn from './functions';
import './menu';
import './newsbar';
// import "./search";
import './aqsa-distance';

if (window.location.pathname.includes('/our-info') || window.location.pathname.includes('/category/')) {
  import('./infos-list');
}

fn.smoothScrollAnchors();
fn.setColorOnFrontPageService();
fn.sticky_index();
