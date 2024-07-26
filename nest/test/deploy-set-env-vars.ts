/* eslint-disable sort-keys-custom-order/object-keys */
const deployTestEnvVars = {
  NODE_ENV: 'test',

  AUTH0_DOMAIN: '',
  AUTH0_CLIENT_ID: '',
  AUTH0_CLIENT_SECRET: '',
  AUTH0_COOKIE_SECRET: '',

  AUTH0_API_ADMIN_IDENTIFIER: '',
  AUTH0_GTNID_ADMIN_IDENTIFIER: '',

  AUTH0_MOBILE_APPLICATION_CLIENT_ID: '',

  USER_IDENTIFICATION_BASE_URL: '',
  GTNID_BASE_URL: '',

  AWS_ACCESS_KEY: '',
  AWS_KEY_SECRET: '',
  AWS_REGION: '',
  AWS_S3_BUCKET: '',
  AWS_ENDPOINT: 'localhost',
  AWS_PORT: '9001',

  DATABASE_URL: 'postgresql://postgres:postgres@127.0.0.1:5432/postgres_test',
  OLD_MYPAGE_DATABASE_URL:
    'mysql://root:root@127.0.0.1:3306/gtnMyPageDBTest?charset=latin1',

  JWT_EXPIRES_IN_SECOND: '360000',

  PGADMIN_DEFAULT_EMAIL: 'email@email.com',
  PGADMIN_DEFAULT_PASSWORD: 'password',
  POSTGRES_DB: 'postgres_test',
  POSTGRES_PASSWORD: 'postgres',
  POSTGRES_USER: 'postgres',

  SALESFORCE_CLIENT_ID: '',
  SALESFORCE_CLIENT_SECRET: '',
  SALESFORCE_USER_NAME: '',
  SALESFORCE_PASSWORD: '',
  SALESFORCE_EMAIL_ADDRESS: 'Salesforce@email.com',
  SF_GTN_MOBILE_EMAIL_ADDRESS: 'sfGtnEmail@email.com',

  Y_MOBLILE_ID: '',
  Y_MOBILE_AND_SOFTBANK_LOGIN_PASSWORD: '',

  SLACK_WEBHOOK_URL: 'url',

  GOOGLE_CLIENT_AUTH_PROVIDER_X509_CERT_URL: '',
  GOOGLE_CLIENT_AUTH_URI: '',
  GOOGLE_CLIENT_CLIENT_EMAIL: '',
  GOOGLE_CLIENT_CLIENT_ID: '',
  GOOGLE_CLIENT_CLIENT_X509_CERT_URL: '',
  GOOGLE_CLIENT_PRIVATE_KEY: '',
  GOOGLE_CLIENT_PRIVATE_KEY_ID: '',
  GOOGLE_CLIENT_PROJECT_ID: '',
  GOOGLE_CLIENT_TOKEN_URI: '',
  GOOGLE_CLIENT_TYPE: '',

  MAIL_HOST: '',
  MAIL_PORT: '',
  MAIL_USER: '',
  MAIL_PASSWORD: '',
  MAIL_FROM_NAME: '',
  MAIL_FROM_ADDRESS: '',

  N_COM_API_KEY: '',
  N_COM_TENANT_ID: '',

  INFO_GTN_EMAIL_ADDRESS: 'info@address.com',

  APP_STORE: '',
  GOOGLE_STORE: '',
  TZ: 'Asia/Tokyo',
};

for (const [key, value] of Object.entries(deployTestEnvVars)) {
  process.env[key] = value;
}
