/**
 * Create new person
 * @param {net.pdc.CreatePerson} person The new person asset
 * @transaction
 */
async function createPerson(tx){
  const factory = getFactory();
  const NAMESPACE = 'net.pdc';
  var newPerson = factory.newResource(NAMESPACE, 'Person', tx.newPerson.idNumber);
  newPerson.name = tx.newPerson.name;
  newPerson.sex = tx.newPerson.sex;
  newPerson.dob = tx.newPerson.dob;
  newPerson.passportNo = tx.newPerson.passportNo;
  newPerson.photo = tx.newPerson.photo;
  newPerson.idScan = tx.newPerson.idScan;
  newPerson.address = tx.newPerson.address;
  
  
  var birthCertificateConcept = factory.newConcept(NAMESPACE, 'Birth');
     birthCertificateConcept.certificateNo = tx.newPerson.birthCertificate.certificateNo;
    birthCertificateConcept.placeOfBirth = tx.newPerson.birthCertificate.placeOfBirth;
   birthCertificateConcept. hospitalOfBirth = tx.newPerson.birthCertificate.hospitalOfBirth;
    birthCertificateConcept.fatherIdNumber = tx.newPerson.birthCertificate.fatherIdNumber;
    birthCertificateConcept.motherIdNumber = tx.newPerson.birthCertificate.motherIdNumber;
    birthCertificateConcept.informantIdNumber = tx.newPerson.birthCertificate.informantIdNumber;
    birthCertificateConcept.registrar = tx.newPerson.birthCertificate.registrar;
    birthCertificateConcept.dob = tx.newPerson.birthCertificate.dob;
    birthCertificateConcept.doi = tx.newPerson.birthCertificate.doi; 
   newPerson.birthCertificate = birthCertificateConcept;
  
  const personAssetRegestry = await getAssetRegistry('net.pdc.Person');
  await personAssetRegestry.add(newPerson);
}

