export const asyncHandler = (fn: any) =>
	function asyncUtilWrap(...args: any[]) {
		const fnReturn = fn(...args);
		const next = args[args.length - 1];
		return Promise.resolve(fnReturn).catch(next);
	};
