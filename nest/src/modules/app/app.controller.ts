import { Controller, Get } from '@nestjs/common';

@Controller()
export class AppController {
  @Get()
  async get() {
    return 'Hello World!';
  }

  @Get('/health')
  async health() {
    return 'ok';
  }
}
