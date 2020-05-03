/**
 * Create new person
 * @param {net.pdc.CreatePerson} person The new person asset
 * @transaction
 */
async function createPerson(aPerson){
  const factory = getFactory();
  var newPerson = factory.newResource('net.pdc', 'Person', aPerson.idNumber);
  const personAssetRegestry = await getAssetRegestry('net.pdc.Person');
  await personAssetRegestry.add(aPerson);
}

