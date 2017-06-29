import Ember from 'ember';
// import InfinityRoute from "ember-infinity/mixins/route";


export default Ember.Route.extend({
  model(){
    return this.store.findAll('user')
  }
});
